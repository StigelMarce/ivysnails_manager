import "./bootstrap";
import "flowbite";
import "./jquery.js";
import "./../../vendor/power-components/livewire-powergrid/dist/powergrid";
import Swal from "sweetalert2";  
import './select2.full.min.js';  

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

//require("flatpickr/dist/themes/dark.css");

window.flatpickr = flatpickr;
window.Dropzone = Dropzone;
window.Calendar = Calendar;
window.dayGridPlugin = dayGridPlugin;
window.listPlugin = listPlugin;
window.timeGridPlugin = timeGridPlugin;
window.interactionPlugin = interactionPlugin;
window.Swal = Swal; 

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

window.cargarLivewire = function (component) {
    if (window.Livewire) {
        wireloaderShow();
        Livewire.dispatch("loadComponent", [component]);
    }
};

window.askCargarComponente = function (component) {
    Swal.fire({
        title: "¿Estás seguro?",
        text: "Los datos ingresados no se guardarán.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, volver",
        cancelButtonText: "Cancelar",
    }).then((result) => {
        if (result.isConfirmed) {
            cargarLivewire(component);
        }
    });
};

window.wireloaderShow = function () {
    document.getElementById("wireloader").classList.remove("hidden");
};

window.wireloaderHide = function () {
    document.getElementById("wireloader").classList.add("hidden"); 
};

Livewire.on("wireloaderShow", () => {
    wireloaderShow();
});

Livewire.on("wireloaderHide", () => {
    wireloaderHide(); 
});

Livewire.on("initComponents", () => {
    iniciarSelect2();
    iniciarFlatpickr();
});

window.iniciarSelect2 = function () {
    const selector = document.querySelectorAll(".select2");
    for (let i = 0; i < selector.length; i++) {
        $(selector[i]).select2({
            theme: "tailwindcss-3",
            width: "100%",
            dropdownAutoWidth: true, 
            placeholder: "Seleccione una opción",
            allowClear: true,
        });
    }
};

window.iniciarFlatpickr = function () {    
    const config = {
        dateFormat: "d-m-Y", 
        disableMobile: "true",
    };
    const selector = document.querySelectorAll(".flatpickr");
    for (let i = 0; i < selector.length; i++) {
        flatpickr(selector[i], config);
    } 
}

Livewire.on("successAlert", (data) => {
    Swal.fire({
        icon: "success",
        title: "Operación exitosa",
        text: data.message,
        timer: 3000,
        timerProgressBar: true,
        showConfirmButton: false,
    });
});

Livewire.on("errorAlert", (data) => {
    Swal.fire({
        icon: "error",
        title: "Error",
        text: data.message,
        timer: 3000,
        timerProgressBar: true,
        showConfirmButton: false,
    });
});