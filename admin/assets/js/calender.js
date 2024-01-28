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
function displayCalendar(date, currentDate) {
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
        tableHtml += <th>${day}</th>;
    });

    tableHtml += '</tr><tr>';

    // Display empty cells for the days before the first day of the month
    for (let i = 0; i < firstDayOfWeek; i++) {
        tableHtml += '<td></td>';
    }

    // Display the days of the month
    for (let day = 1; day <= daysInMonth; day++) {
        const cellDate = new Date(year, month, day);

        if (cellDate.toDateString() === currentDate.toDateString()) {
            tableHtml += <td class="current-date">${day}</td>;
        } else {
            tableHtml += <td>${day}</td>;
        }

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