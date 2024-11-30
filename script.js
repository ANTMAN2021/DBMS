// Fetch and display all records when the page loads
document.addEventListener('DOMContentLoaded', function() {
    fetchRecords();
});

// Function to fetch records from the server
function fetchRecords() {
    fetch('fetch.php')
        .then(response => response.json())
        .then(data => {
            const recordsDiv = document.getElementById('records');
            recordsDiv.innerHTML = '';

            if (data.length === 0) {
                recordsDiv.innerHTML = '<p>No records found.</p>';
                return;
            }

            data.forEach(record => {
                const recordDiv = document.createElement('div');
                recordDiv.innerHTML = `<strong>Name:</strong> ${record.name} | <strong>Age:</strong> ${record.age} | <strong>Email:</strong> ${record.email}`;
                recordsDiv.appendChild(recordDiv);
            });
        });
}