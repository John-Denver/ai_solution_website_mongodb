import { BrowserRouter } from 'react-router-dom';
import { AuthProvider } from './context/AuthContext';
import AdminRoutes from './routes/AdminRoutes';
import './App.css';

function App() {
  return (
    <BrowserRouter>
      <AuthProvider>
        <AdminRoutes />
      </AuthProvider>
    </BrowserRouter>
  );
}

export default App;