<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Student API Tester</title>
  <style>
    body { font-family: Arial; padding: 20px; background: #f8f9fa; }
    h2 { color: #007bff; }
    textarea, input { width: 100%; margin-bottom: 10px; }
    button { background: #007bff; color: white; border: none; padding: 8px 16px; border-radius: 6px; cursor: pointer; }
    button:hover { background: #0056b3; }
    pre { background: #fff; padding: 10px; border-radius: 8px; border: 1px solid #ccc; }
  </style>
</head>
<body>

  <h2>Student API Tester (CodeIgniter 4)</h2>

  <label>Student ID (for GET/PUT/DELETE):</label>
  <input type="number" id="studentId" placeholder="Enter ID if needed" />

  <label>Request Body (JSON):</label>
  <textarea id="jsonBody" rows="6">
{
  "name": "Bhavana Reddy",
  "date_of_birth": "2001-05-12",
  "intake_class": "CS401",
  "department_id": 2
}
  </textarea>

  <button onclick="getAll()">GET All</button>
  <button onclick="getById()">GET by ID</button>
  <button onclick="createStudent()">POST (Create)</button>
  <button onclick="updateStudent()">PUT (Update)</button>
  <button onclick="deleteStudent()">DELETE</button>

  <h3>Response:</h3>
  <pre id="response"></pre>

  <script>
    // Use your actual base URL for all API calls
    const baseUrl = "http://localhost/backend/student_api_ci/public/students";

    async function getAll() {
      const res = await fetch(baseUrl);
      document.getElementById('response').textContent = await res.text();
    }

    async function getById() {
      const id = document.getElementById('studentId').value;
      const res = await fetch(`${baseUrl}/${id}`);
      document.getElementById('response').textContent = await res.text();
    }

    async function createStudent() {
      const body = document.getElementById('jsonBody').value;
      const res = await fetch(baseUrl, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: body
      });
      document.getElementById('response').textContent = await res.text();
    }

    async function updateStudent() {
      const id = document.getElementById('studentId').value;
      const body = document.getElementById('jsonBody').value;
      const res = await fetch(`${baseUrl}/${id}`, {
        method: "PUT",
        headers: { "Content-Type": "application/json" },
        body: body
      });
      document.getElementById('response').textContent = await res.text();
    }

    async function deleteStudent() {
      const id = document.getElementById('studentId').value;
      const res = await fetch(`${baseUrl}/${id}`, { method: "DELETE" });
      document.getElementById('response').textContent = await res.text();
    }
  </script>
</body>
</html>
