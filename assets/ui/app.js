import 'picturefill';

import './scss/style.scss';

import cookieConsent from './js/cookieConsent';
import videolink from './js/videolink';

document.addEventListener('DOMContentLoaded', () => {
    cookieConsent();
    videolink();
});
