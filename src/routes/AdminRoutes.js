import { Routes, Route, Navigate } from 'react-router-dom';
import { useAuth } from '../context/AuthContext';
import AdminLayout from '../layouts/AdminLayout';
import Dashboard from '../pages/admin/Dashboard';
import Inquiries from '../pages/admin/Inquiries';
import BlogPosts from '../pages/admin/BlogPosts';
import Events from '../pages/admin/Events';
import Services from '../pages/admin/Services';
import Login from '../pages/admin/Login';

const AdminRoutes = () => {
  const { admin } = useAuth();

  return (
    <Routes>
      {!admin ? (
        <Route path="/admin/*" element={<Login />} />
      ) : (
        <Route path="/admin" element={<AdminLayout />}>
          <Route index element={<Dashboard />} />
          <Route path="inquiries" element={<Inquiries />} />
          <Route path="blog" element={<BlogPosts />} />
          <Route path="events" element={<Events />} />
          <Route path="services" element={<Services />} />
        </Route>
      )}
      <Route path="*" element={<Navigate to={admin ? "/admin" : "/admin/login"} />} />
    </Routes>
  );
};

export default AdminRoutes;