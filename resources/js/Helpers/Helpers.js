export const formatCurrency = (n) => {
    const currencyFormat = Intl.NumberFormat("de-DE", {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2,
    });
    n = n ? n : 0; // number NaN = 0
    return "$ " + currencyFormat.format(parseFloat(n));
};
export const formatDate = (date) => {
    const dtf = new Intl.DateTimeFormat("es", {
        weekday: "long",
        year: "2-digit",
        month: "short",
        day: "2-digit",
    });

    let dateFormat = dtf.format(new Date(date));

    return dateFormat;
};
export const formatDateTime = (date) => {
    const dtf = new Intl.DateTimeFormat("es", {
        weekday: "short",
        hour12: true,
        hour: "2-digit",
        minute: "2-digit",
        year: "2-digit",
        month: "short",
        day: "2-digit",
    });

    let dateFormat = dtf.format(new Date(date));

    return dateFormat;
};
