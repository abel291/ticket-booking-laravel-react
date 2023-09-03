
import './bootstrap';
import Alpine from 'alpinejs';
import mask from '@alpinejs/mask'

import flatpickr from "flatpickr";
import language from 'flatpickr/dist/l10n/es';
flatpickr.localize(language.es);

Alpine.plugin(mask)

window.Alpine = Alpine;
Alpine.start();
