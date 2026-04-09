<?php require_once 'submit.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Careers | Aetheris Systems</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header class="company-header">
        <h1>Aetheris Systems</h1>
        <p>Architecting the Future of Connectivity.</p>
    </header>

    <main>
        <?php if ($submitted): ?>
            <fieldset style="max-width: 500px; margin: 0 auto; text-align: center;">
                <legend>Success</legend>
                <h1>Application Received</h1>
                <p>Thank you for your interest in Aetheris Systems. Your application has been logged in our recruitment
                    system. If your qualifications match our current requirements, a member of our team will contact you
                    directly.</p>
                <br>
                <a href="index.php" style="color: #a7ebf2; font-weight: bold; text-decoration: none;">[ Return to Portal
                    ]</a>
            </fieldset>

        <?php elseif ($error): ?>
            <fieldset style="max-width: 500px; margin: 0 auto; text-align: center; border-color: #ffaaaa;">
                <legend style="color: #ffaaaa;">Error</legend>
                <p>
                    <?= htmlspecialchars($error) ?>
                </p>
                <br>
                <a href="index.php" style="color: #a7ebf2;">Try Again</a>
            </fieldset>

        <?php else: ?>
            <form action="index.php" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>Personal</legend>
                    <label for="full_name">Full Name</label>
                    <input type="text" id="full_name" name="full_name" required>

                    <label for="phone_number">Phone</label>
                    <input type="tel" id="phone_number" name="phone_number" required>

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>

                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" required>

                    <label>Gender</label>
                    <div style="margin-top: 0.5rem;">
                        <label><input type="radio" name="gender" value="male" required> Male</label>
                        <label><input type="radio" name="gender" value="female"> Female</label>
                    </div>

                    <label for="nationality">Nationality</label>
                    <select name="nationality" id="nationality" required>
                        <option value="">Select Region</option>
                        <option value="Zambian">Zambian</option>
                        <option value="South African">South African</option>
                        <option value="Zimbabwean">Zimbabwean</option>
                        <option value="Other">Other</option>
                    </select>
                </fieldset>

                <fieldset>
                    <legend>Education</legend>
                    <label for="highest_qualification">Qualification</label>
                    <select name="highest_qualification" id="highest_qualification" required>
                        <option value="High School">High School Diploma</option>
                        <option value="Bachelor's Degree">Bachelor's Degree</option>
                        <option value="Master's Degree">Master's Degree</option>
                        <option value="Doctorate">Doctorate</option>
                    </select>

                    <label for="institution">Institution</label>
                    <input type="text" id="institution" name="institution" required>

                    <label for="year_completed">Completion Year</label>
                    <input type="date" id="year_completed" name="year_completed" required>

                    <label for="relevant_coursework">Coursework</label>
                    <input type="text" id="relevant_coursework" name="relevant_coursework" required>
                </fieldset>

                <fieldset>
                    <legend>Experience</legend>
                    <label for="position_applied">Position</label>
                    <select name="position_applied" id="position_applied" required>
                        <option value="Software Developer">Software Developer</option>
                        <option value="Data Analyst">Data Analyst</option>
                        <option value="Project Manager">Project Manager</option>
                        <option value="Graphic Designer">Graphic Designer</option>
                    </select>

                    <label for="work_experience">Experience</label>
                    <input type="text" id="work_experience" name="work_experience">

                    <label for="skills">Skills</label>
                    <input type="text" id="skills" name="skills">

                    <label for="references">References</label>
                    <input type="text" id="references" name="references" required>
                </fieldset>

                <fieldset id="documents">
                    <legend>Documents</legend>
                    <label for="cv">CV (PDF/DOCX)</label>
                    <input type="file" id="cv" name="cv" accept=".pdf,.doc,.docx" required>

                    <label for="certs">Certificates</label>
                    <input type="file" id="certs" name="certs" accept=".pdf,.jpg,.jpeg,.png">
                </fieldset>

                <button type="submit">Deploy Application</button>
            </form>
        <?php endif; ?>
    </main>

</body>

</html>