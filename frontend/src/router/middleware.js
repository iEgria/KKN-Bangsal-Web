import axios from 'axios'

export default function auth({ next, router }) {
    axios.post('auth/checkSession').then((response) => {
        window.localStorage.setItem('roles', response.data.data.roles);
        window.localStorage.setItem('name', response.data.data.name);
    }).catch(() => {
        return router.push({ name: 'auth.login' });
    });

    return next();
}