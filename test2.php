<form>
<input type='submit' name='approve' />
</form>


<form>
<input type='submit' name='disapprove' />
</form>

if(isset($_POST['approve'])) {
"UPDATE topic SET a_count = a_count + 1 WHERE topic_id = $topic";
}
if(isset($_POST['disapprove'])) {
$disapprove = "UPDATE topic SET d_count = d_count + 1 WHERE topic_id = $topic";;
}