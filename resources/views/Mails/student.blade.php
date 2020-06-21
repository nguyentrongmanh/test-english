<section class="mail-body">
<h3>
  	<p>Dear, <strong>{{ $student->name }}</strong></p>
</h3>
<p>You are now a member of the <strong>{{ $class->name }}</strong> class.
	See details at {{ url('/profile')}}.
</p>
<p>Thank you for trusting and using our service. Have a nice day!</p>
</section>
