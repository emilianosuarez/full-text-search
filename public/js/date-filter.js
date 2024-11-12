let minDate, maxDate;
 
// Custom filtering function which will search data in column four between two values
DataTable.ext.search.push(function (settings, data, dataIndex) {
    let min = minDate.val();
    let max = maxDate.val();
    let date = new Date(data[4]);
 
    if (
        (min === null && max === null) ||
        (min === null && date <= max) ||
        (min <= date && max === null) ||
        (min <= date && date <= max)
    ) {

        return true;
    }
    return false;
});
 
// Create date inputs
minDate = new DateTime('#date_from', {
    format: 'MMMM Do YYYY'
});
maxDate = new DateTime('#date_to', {
    format: 'MMMM Do YYYY'
});
 
// DataTables initialisation
// let table = new DataTable('#example');
// let table = $('#datatable').DataTable();
 
// Refilter the table
document.querySelectorAll('#date_from, #date_to').forEach((el) => {
    el.addEventListener('change', () => $('#datatable').DataTable().draw());
});