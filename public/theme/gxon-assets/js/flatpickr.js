document.addEventListener("DOMContentLoaded", () => {

    const commonOptions = {
        dateFormat: "Y-m-d H:i",
        disableMobile: true
    };

    const flatpickrConfigs = [
        { selector: "#flatpickr_basic", options: { ...commonOptions } },
        { selector: "#flatpickr_datetime", options: { ...commonOptions, enableTime: true } },
        { selector: "#flatpickr_time", options: { noCalendar: true, enableTime: true, disableMobile: true } },
        { selector: "#flatpickr_range", options: { mode: 'range' } },
        { selector: "#flatpickr_multiple_dates", options: { mode: 'multiple' } },
        { selector: "#flatpickr_localization", options: { ...commonOptions, enableTime: true, locale: "fr" } },
        { selector: "#flatpickr_inline", options: { ...commonOptions, enableTime: true, inline: true } },
        { selector: "#flatpickr_weeknumbers", options: { ...commonOptions, enableTime: true, weekNumbers: true } },
    ];

    flatpickrConfigs.forEach(({ selector, options }) => {
        const el = document.querySelector(selector);
        if (el) {
            flatpickr(el, options);
        }
    });

});
