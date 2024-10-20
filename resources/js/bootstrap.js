import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
document.querySelector('meta[name="csrf-token"]').getAttribute('content');

axios.defaults.headers.common['X-XSRF-TOKEN'] = getCookie('XSRF-TOKEN');

function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
}

