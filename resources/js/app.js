import 'bootstrap';
import $ from 'jquery';

// Ekspos jQuery secara global agar dapat diakses oleh script inline dan Blade views
window.$ = window.jQuery = $;
