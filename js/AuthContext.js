import { createContext, useState, useEffect, useContext, useCallback } from 'react';
import * as authService from '../services/auth';

const AuthContext = createContext();

export const AuthProvider = ({ children }) => {
  const [admin, setAdmin] = useState(null);
  const [token, setToken] = useState(null);
  const [loading, setLoading] = useState(true);

  const refreshAuth = useCallback(async () => {
    try {
      const { token: newToken } = await authService.refreshToken();
      const { admin } = await authService.getCurrentAdmin(newToken);
      setToken(newToken);
      setAdmin(admin);
      return true;
    } catch (err) {
      return false;
    }
  }, []);

  useEffect(() => {
    const initializeAuth = async () => {
      try {
        // Try to refresh token on initial load
        const refreshed = await refreshAuth();
        if (!refreshed) {
          throw new Error('Not authenticated');
        }
      } catch (err) {
        // No valid session
      } finally {
        setLoading(false);
      }
    };

    initializeAuth();

    // Set up token refresh interval (every 14 minutes)
    const interval = setInterval(refreshAuth, 14 * 60 * 1000);
    return () => clearInterval(interval);
  }, [refreshAuth]);

  const login = async (username, password) => {
    const { token, admin } = await authService.login(username, password);
    setToken(token);
    setAdmin(admin);
  };

  const logout = async () => {
    try {
      await authService.logout();
    } finally {
      setToken(null);
      setAdmin(null);
    }
  };

  return (
    <AuthContext.Provider value={{ admin, token, login, logout, loading }}>
      {children}
    </AuthContext.Provider>
  );
};

export const useAuth = () => useContext(AuthContext);