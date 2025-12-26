<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Management System</title>
    <link rel="stylesheet" href="../assets/index.css" />
</head>

<body>
    <div class="header">
        <h1>User Registeration</h1>
        <p>Welcome to the User Management System. Please Register below:</p>
    </div>
    <div class="container">
        <form action="add.php" method="post" id="form">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="enter your full name" /><br /><br />

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="enter your email address" /><br /><br />

            <label for="phone">Phone No:</label>
            <input type="text" id="phone" name="phone" placeholder="enter your phone number" /><br /><br />

            <label for="course">Course:</label>
            <select id="course" name="course" required>
                <option value="select" class="select-holder" aria-placeholder="true" disabled selected>
                    (select your course)
                </option>
                <option value="Web Development">Web Development</option>
                <option value="Data Science">Data Science</option>
                <option value="Digital Marketing">Digital Marketing</option>
                <option value="Graphic Design">Graphic Design</option>
            </select><br /><br />

            <label for="message">Message:</label>
            <textarea id="message" name="message" placeholder="enter your message here..."></textarea><br /><br />

            <button type="submit">Register</button>
        </form>
    </div>
</body>

<footer>
    <p>&copy; 2025 User Management System. All rights reserved.</p>
</footer>

</html>
