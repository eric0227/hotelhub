<?php
return array(
	'My button'=>new PPPhpButton(
		"My button",
		"<form action=\"https://www.sandbox.paypal.com/cgi-bin/webscr\" method=\"post\">\n<input type=\"hidden\" name=\"cmd\" value=\"_s-xclick\">\n<input type=\"hidden\" name=\"hosted_button_id\" value=\"S93NJZFRSUD78\">\n<input type=\"image\" src=\"https://www.sandbox.paypal.com/en_AU/i/btn/btn_buynow_LG.gif\" border=\"0\" name=\"submit\" alt=\"PayPal — The safer, easier way to pay online.\">\n<img alt=\"\" border=\"0\" src=\"https://www.sandbox.paypal.com/en_AU/i/scr/pixel.gif\" width=\"1\" height=\"1\">\n</form>\n",
		"https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=S93NJZFRSUD78",
		"S93NJZFRSUD78"
	),
	'Test'=>new PPPhpButton(
		"Test",
		"<form action=\"https://www.sandbox.paypal.com/cgi-bin/webscr\" method=\"post\">\n<input type=\"hidden\" name=\"cmd\" value=\"_s-xclick\">\n<input type=\"hidden\" name=\"hosted_button_id\" value=\"VFMWBEFD3TBMQ\">\n<input type=\"image\" src=\"https://www.sandbox.paypal.com/en_AU/i/btn/btn_buynow_LG.gif\" border=\"0\" name=\"submit\" alt=\"PayPal — The safer, easier way to pay online.\">\n<img alt=\"\" border=\"0\" src=\"https://www.sandbox.paypal.com/en_AU/i/scr/pixel.gif\" width=\"1\" height=\"1\">\n</form>\n",
		"https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=VFMWBEFD3TBMQ",
		"VFMWBEFD3TBMQ"
	),
);
?>