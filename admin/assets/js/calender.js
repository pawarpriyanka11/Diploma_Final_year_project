/*document.addEventListener("DOMContentLoaded", function () {
    const currentDate = new Date();
    displayCalendar(currentDate);
    updateMonthYear(currentDate);

    document.getElementById("prev-month").addEventListener("click", function () {
        currentDate.setMonth(currentDate.getMonth() - 1);
        displayCalendar(currentDate);
        updateMonthYear(currentDate);
    });

    document.getElementById("next-month").addEventListener("click", function () {
        currentDate.setMonth(currentDate.getMonth() + 1);
        displayCalendar(currentDate);
        updateMonthYear(currentDate);
    });
});

function displayCalendar(date) {
    const calendarDiv = document.getElementById("calendar");

    const year = date.getFullYear();
    const month = date.getMonth();
    const firstDayOfMonth = new Date(year, month, 1);
    const lastDayOfMonth = new Date(year, month + 1, 0);

    const daysInMonth = lastDayOfMonth.getDate();
    const firstDayOfWeek = firstDayOfMonth.getDay();

    const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

    let tableHtml = '<table id="calendar">';
    tableHtml += '<tr>';

    // Display day names
    days.forEach(day => {
        tableHtml += `<th>${day}</th>`;
    });

    tableHtml += '</tr><tr>';

    // Display empty cells for the days before the first day of the month
    for (let i = 0; i < firstDayOfWeek; i++) {
        tableHtml += '<td></td>';
    }

    // Display the days of the month
    for (let day = 1; day <= daysInMonth; day++) {
        tableHtml += `<td>${day}</td>`;
        if ((firstDayOfWeek + day) % 7 === 0) {
            tableHtml += '</tr><tr>';
        }
    }

    // Fill in remaining empty cells in the last row
    const remainingEmptyCells = 7 - ((firstDayOfWeek + daysInMonth) % 7);
    for (let i = 0; i < remainingEmptyCells; i++) {
        tableHtml += '<td></td>';
    }

    tableHtml += '</tr></table>';

    calendarDiv.innerHTML = tableHtml;
}

function updateMonthYear(date) {
    const monthYearElement = document.getElementById("current-month-year");
    const options = { month: "long", year: "numeric" };
    monthYearElement.textContent = date.toLocaleDateString("en-US", options);
}
*/

document.addEventListener("DOMContentLoaded", function () {
    const currentDate = new Date();
    displayCalendar(currentDate);
    updateMonthYear(currentDate);

    document.getElementById("prev-month").addEventListener("click", function () {
        currentDate.setMonth(currentDate.getMonth() - 1);
        displayCalendar(currentDate);
        updateMonthYear(currentDate);
    });

    document.getElementById("next-month").addEventListener("click", function () {
        currentDate.setMonth(currentDate.getMonth() + 1);
        displayCalendar(currentDate);
        updateMonthYear(currentDate);
    });
});

function displayCalendar(date) {
    const calendarDiv = document.getElementById("calendar");

    const year = date.getFullYear();
    const month = date.getMonth();
    const day = date.getDate(); // Get the current day

    const firstDayOfMonth = new Date(year, month, 1);
    const lastDayOfMonth = new Date(year, month + 1, 0);

    const daysInMonth = lastDayOfMonth.getDate();
    const firstDayOfWeek = firstDayOfMonth.getDay();

    const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

    let tableHtml = '<table id="calendar">';
    tableHtml += '<tr>';

    // Display day names
    days.forEach(day => {
        tableHtml += `<th>${day}</th>`;
    });

    tableHtml += '</tr><tr>';

    // Display empty cells for the days before the first day of the month
    for (let i = 0; i < firstDayOfWeek; i++) {
        tableHtml += '<td></td>';
    }

    // Display the days of the month
    for (let dayNumber = 1; dayNumber <= daysInMonth; dayNumber++) {
        // Check if the current day is the current date
        const isCurrentDate = dayNumber === day && date.getMonth() === new Date().getMonth() && date.getFullYear() === new Date().getFullYear();

        // Add a class to highlight the current date
        const tdClass = isCurrentDate ? 'current-date' : '';

        tableHtml += `<td class="${tdClass}">${dayNumber}</td>`;

        if ((firstDayOfWeek + dayNumber) % 7 === 0) {
            tableHtml += '</tr><tr>';
        }
    }

    // Fill in remaining empty cells in the last row
    const remainingEmptyCells = 7 - ((firstDayOfWeek + daysInMonth) % 7);
    for (let i = 0; i < remainingEmptyCells; i++) {
        tableHtml += '<td></td>';
    }

    tableHtml += '</tr></table>';

    calendarDiv.innerHTML = tableHtml;
}

function updateMonthYear(date) {
    const monthYearElement = document.getElementById("current-month-year");
    const options = { month: "long", year: "numeric" };
    monthYearElement.textContent = date.toLocaleDateString("en-US", options);
}
