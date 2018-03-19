<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?

$username = $_POST['username'];
$section = $_POST['section'];
$cardnum = $_POST['creditnum'];
$cardtype = $_POST['cardtype'];

?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Buy Your Way to a Better Education!</title>
		<link href="http://www.cs.washington.edu/education/courses/cse190m/09sp/labs/4-buyagrade/buyagrade.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<?
		if (isset($cardnum) && isset($cardtype) && isset($username)) 
		{
		?>
		<h1>Thanks, sucker!</h1>

		<p>Your information has been recorded.</p>

		<dl>
			<dt>Name</dt>
			<dd><?= $username?></dd>

			<dt>Section</dt>
			<dd><?= $section?></dd>

			<dt>Credit Card</dt>
			<dd>
			<?= $cardnum . " (". $cardtype.")" ?>
			<?
				file_put_contents("suckers.txt", $username .";". $section .";". $cardnum.";". $cardtype . "\n",FILE_APPEND);
			?>
			</dd>
		</dl>
		
		<p>Here are all the suckers who have submitted here: </p>

		<code>
			<?		
			$lines = file("suckers.txt",FILE_IGNORE_NEW_LINES);
			foreach ($lines as $value) {
			?>
			<?= $value?>
			<br>
			<?}?>
		</code>
		<?}
		else
		{?>
			<center><h1>Sorry!</h1></center>
			<p>You didn't fill out the form completely. <a href="sucker.php">Try again ?</a></p>
		<?
		} 
		?>
	</body>
</html>  















