import './bootstrap';
import { StrictMode } from 'react';
import { createRoot } from 'react-dom/client';
import Welcome from './components/Welcome';

const root = document.getElementById('app');

if (root) {
  createRoot(root).render(
    <StrictMode>
      <Welcome />
    </StrictMode>,
  );
}
