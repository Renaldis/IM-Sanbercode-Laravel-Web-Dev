<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Buat Account Baru!</h1>
    <h4>Sign Up Form</h4>
    <form action="/send" method="POST">
        @csrf
        <div>
            <label for="firstName">First Name:</label><br>
            <input type="text" name="firstName" id="firstName">
        </div>
        <div>
            <label for="lastName">Last Name:</label><br>
            <input type="text" name="lastName" id="lastName">
        </div><br>
        <div>
            <label for="gender">Gender:</label><br>
            <input type="radio" name="gender" id="male" value="male"><label for="male">Male</label><br>
            <input type="radio" name="gender" id="female" value="female"><label for="female">Female</label><br>
            <input type="radio" name="gender" id="other" value="other"><label for="other">Other</label><br>
        </div><br>
        <div>
            <label for="nationality">Nationality:</label>
            <select name="nationality" id="nationality">
                <option value="indonesian">Indonesian</option>
                <option value="singaporean">Singaporean</option>
                <option value="malaysian">Malaysian</option>
                <option value="australian">Australian</option>
            </select>
        </div><br>
        <div>
            <label for="languange">Languange Spoken:</label><br>
            <input type="checkbox" name="language[]" id="bindo" value="Bahasa Indonesia"><label for="bindo">Bahasa Indonesia</label><br>
            <input type="checkbox" name="language[]" id="english" value="English"><label for="english">English</label><br>
            <input type="checkbox" name="language[]" id="otherLang" value="Other"><label for="otherLang">Other</label><br>
        </div><br>
        <div>
            <label for="bio">Bio:</label><br>
            <textarea name="bio" id="bio" cols="30" rows="6"></textarea>
        </div>
        <button type="submit">Sign Up</button>
    </form>
</body>
</html>