<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Counseling Center</title>
 <style>
    body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

header {
  background-color: #8c1515;
  color: #fff;
  padding: 10px;
  text-align: center;
}

nav {
  margin-top: 10px;
}

nav ul {
  list-style: none;
  padding: 0;
}

nav li {
  display: inline;
  margin: 0 10px;
}

nav a {
  color: #fff;
  text-decoration: none;
}

nav a:hover {
  text-decoration: underline;
}

main {
  padding: 20px;
}

section {
  margin-bottom: 30px;
}

h2 {
  color: #333;
}
#counselors{
    display:flex;
  justify-content:space-between;
}
.counselor {
  display: flex;
  align-items: center;
  margin-bottom: 20px;
}

.counselor img {
  max-width: 200px;
  height:150px;
  margin-right: 20px;
}

.counselor-details {
  flex: 1;
}

.counselor h3 {
  color: #333;
}

.counselor p {
  color: #666;
  margin: 5px 0;
}

footer {
  background-color: #333;
  color: #fff;
  padding: 10px;
  text-align: center;
}
 </style>
</head>
<body>
  <header>
    <h1>Welcome to Counseling Center, RGUKTB</h1>
    <nav>
      <ul>
        <li><a href="#services">Counseling Services</a></li>
        <li><a href="#counselors">Meet the Counselors</a></li>
        
      </ul>
    </nav>
  </header>

  <main>
    <section id="services">
      <h2>Counseling Services</h2>
      <ul>
        <li>Academic Stress Management</li>
        <li>Time Management and Study Skills</li>
        <li>Adjustment to College Life</li>
        <li>Anxiety and Test-taking Strategies</li>
        <li>Depression and Emotional Support</li>
        <li>Career Counseling and Guidance</li>
      </ul>
    </section>
    <h2>Meet the Counselors</h2>
    <section id="counselors">
      <div class="counselor">
        <img src="nagalaxmi.jpg" alt="Counselor 1">
        <div class="counselor-details">
          <h3>G.Nagalaxmi</h3>
          <p>Email:<a href="counsellor.nlaxmi@rgukt.ac.in">counsellor.nlaxmi@rgukt.ac.in</a></p>
          <p>Phone:9492634256</p>
        </div>
      </div>
      <div class="counselor">
        <img src="shiva.jpg" alt="Counselor 2">
        <div class="counselor-details">
          <h3>B.Siva Kumar</h3>
          <p>Email:
            <a href="counsellor.shiva@rgukt.ac.in">counsellor.shiva@rgukt.ac.in</a></p>
          <p>Phone: 9912613760</p>
        </div>
      </div>
      <div class="counselor">
        <img src="sri.jpg" alt="Counselor 2">
        <div class="counselor-details">
          <h3>P.Srilakshmi</h3>
          <p>Email: 
          <a href="counsellor.sri@rgukt.ac.in"> counsellor.sri@rgukt.ac.in</a></p>
          <p>Phone: 9440395866</p>
        </div>
      </div>
    </section>
  </main>

  <footer>
    <p>Contact us at: <a href="mailto:rgukt@example.com">rgukt@gmail.com</a></p>
  </footer>
</body>
</html>
