# Election of Student Council President

This project is a web-based application built using PHP native to manage the election of a student council president. It allows students to cast votes for their preferred candidates, view real-time voting results, and see an overview of the voting process. 

## Features
- **Voting System**: Students can vote for their desired candidate, with each vote properly recorded in the database.
- **Candidate List**: Displays a list of candidates, with each candidate's details (e.g., name, picture, and bio).
- **Vote Count**: Each vote increments the candidate's total in the database.
- **Modal Popup for Confirmation**: After voting, a modal popup displays the chosen candidate’s name.
- **Real-Time Results**: Results are displayed using Chart.js in the form of a pie chart, showcasing live voting statistics.
- **Bootstrap Alerts**: Notifications are provided to the users for actions such as successful voting, errors, or other interactions.

## Technologies Used
- **PHP** (Native): Core backend logic.
- **MySQL**: Database to store votes, candidates, and results.
- **AJAX**: For seamless voting experience without page reload.
- **Chart.js**: To visualize the voting results in a pie chart.
- **Bootstrap**: For responsive design and alerts.

## Installation
1. Clone the repository:
   ```bash
   git clone https://github.com/Brajesh31/election-of-student-council-president.git
   ```

2. Move to the project directory:
   ```bash
   cd election-of-student-council-president
   ```

3. Create a database in MySQL:
   ```sql
   CREATE DATABASE student_council_election;
   ```

4. Import the database from the provided SQL file:
   ```bash
   mysql -u Brajesh31 -p student_council_election < database.sql
   ```

5. Configure the database connection in the project:
   - Open `config.php` and update the database credentials.

6. Run the application on your local server:
   - Use a local server like XAMPP or WAMP to host the project.
   - Move the project files to the `htdocs` folder and visit `http://localhost/election-of-student-council-president` to access the application.

## Usage
- **Admin Panel**: Add, edit, and manage candidate details. Admin can also reset the votes and view detailed reports.
- **Student Voting**: Each student is allowed to vote once. After voting, the student is shown a confirmation modal with their chosen candidate’s details.
- **Results Page**: Displays real-time voting results in a visual format.

## Contributing
Feel free to fork this repository and submit pull requests for any enhancements or bug fixes. Contributions are welcome!


Last updated: 2026-10-25 21:26 UTC
