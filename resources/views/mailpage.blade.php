<!DOCTYPE html>
<html>
<body>

<h2>Mail Page</h2>
<form action="{{ route('dashboard.studentprofile.mailpage.sendmail') }}" method="POST">
    @csrf
    <label for="subject">Subject</label><br>
    <input type="text" id="subject" name="subject"><br>
    <label for="body">Body</label><br>
    <input type="text" id="body" name="body"><br><br>
    <input type="hidden" name="studentId" value="<?=$student->id?>"/>
    <input type="submit" value="Submit">
</form>

</body>
</html>
