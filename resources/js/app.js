import "./bootstrap";
import "flowbite";
import "./jquery.js";

import "jsvectormap/dist/jsvectormap.min.css";
import "flatpickr/dist/flatpickr.min.css";
import "dropzone/dist/dropzone.css";

import { OverlayScrollbars } from "overlayscrollbars";
import "overlayscrollbars/styles/overlayscrollbars.css";


import flatpickr from "flatpickr";
import Dropzone from "dropzone";
import { Calendar } from "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";
import listPlugin from "@fullcalendar/list";
import timeGridPlugin from "@fullcalendar/timegrid";
import interactionPlugin from "@fullcalendar/interaction";

window.flatpickr = flatpickr;
window.Dropzone = Dropzone;
window.Calendar = Calendar;
window.dayGridPlugin = dayGridPlugin;
window.listPlugin = listPlugin;
window.timeGridPlugin = timeGridPlugin;
window.interactionPlugin = interactionPlugin;

document.addEventListener("DOMContentLoaded", () => {
    // Aplicar overlay scrollbars a id main-content
    OverlayScrollbars(document.getElementById("main-content"), {
        className: "os-theme-light",
        scrollbars: {
            autoHide: "leave",
            clickScrolling: true,
        },
    });

    // Ocultar el scrollbar nativo del dom
    document.body.style.overflow = "hidden";
    document.documentElement.style.overflow = "hidden";
    // document.getElementById("main-content").style.overflow = "hidden"; --- IGNORE ---
    // document.getElementById("main-content").style.paddingRight = "16px"; --- IGNORE ---
    // document.getElementById("main-content").style.height = "100vh"; --- IGNORE ---
    // document.getElementById("main-content").style.boxSizing = "border-box"; --- IGNORE ---

    // Ajustar el padding del body para evitar el salto de contenido
    const scrollbarWidth =
        window.innerWidth - document.documentElement.clientWidth;
    if (scrollbarWidth > 0) {
        document.body.style.paddingRight = `${scrollbarWidth}px`;
    }
});
 