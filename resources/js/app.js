// import Alpine from "alpinejs";
// import autoAnimate from "@formkit/auto-animate";
// import Focus from "@alpinejs/focus";
// import FormsAlpinePlugin from "../../vendor/filament/forms/dist/module.esm";
// import NotificationsAlpinePlugin from "../../vendor/filament/notifications/dist/module.esm";

// window.Alpine = Alpine;
// Alpine.plugin(Focus);
// Alpine.plugin(Tooltip);
// window.Alpine = Alpine;
// Alpine.directive("animate", (el) => {
//     autoAnimate(el);
// });
// Alpine.plugin(FormsAlpinePlugin);
// Alpine.plugin(NotificationsAlpinePlugin);
// Alpine.start();

import Alpine from "alpinejs";
import autoAnimate from "@formkit/auto-animate";
import Focus from "@alpinejs/focus";
import FormsAlpinePlugin from "../../vendor/filament/forms/dist/module.esm";
import NotificationsAlpinePlugin from "../../vendor/filament/notifications/dist/module.esm";

Alpine.directive("animate", (el) => {
    autoAnimate(el);
});
Alpine.plugin(Focus);
Alpine.plugin(FormsAlpinePlugin);
Alpine.plugin(NotificationsAlpinePlugin);

window.Alpine = Alpine;

Alpine.start();
