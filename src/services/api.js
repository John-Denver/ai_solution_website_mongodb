const API_URL = 'https://ai-solution-website-backend.onrender.com';

// const API_URL = process.env.REACT_APP_API_URL;

export default {
  // Authentication
  login: async (username, password) => {
    const response = await fetch(`${API_URL}/api/admin/login`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ username, password })
    });
    return await response.json();
  },

  // Protected routes
  getInquiries: async (token) => {
    const response = await fetch(`${API_URL}/api/admin/inquiries`, {
      headers: { 'Authorization': `Bearer ${token}` }
    });
    return await response.json();
  },

  getBlogPosts: async (token) => {
    const response = await fetch(`${API_URL}/api/admin/blogs`, {
      headers: { 'Authorization': `Bearer ${token}` }
    });
    return await response.json();
  },

  // Add other API calls similarly...
};