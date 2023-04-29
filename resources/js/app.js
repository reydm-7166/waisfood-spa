import { createApp, h } from 'vue'
import { createInertiaApp, Link, Head } from '@inertiajs/vue3'
import Layout from "../js/Pages/Template/Layout.vue";
import { resolvePageComponent } from 'vite-plugin-laravel/inertia';
import './bootstrap';

createInertiaApp({
    resolve: name => {
        // let page = resolvePageComponent(name, import.meta.glob('../views/pages/**/*.vue'));
        const page = resolvePageComponent(name, import.meta.glob('./Pages/**/*.vue', { eager: true }));
        page.then((module) => {
            module.layout ??= Layout;
        });
        return page;
    },


  progress: {
    // The delay after which the progress bar will appear
    // during navigation, in milliseconds.
    delay: 250,

    // The color of the progress bar.
    color: '#29d',

    // Whether to include the default NProgress styles.
    includeCSS: true,

    // Whether the NProgress spinner will be shown.
    showSpinner: false,
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .mixin({ methods: { route } })
      .component('Link', Link)
      .component('Head', Head)
      .mount(el)
  },
})


