<?php
/**
 * @author Matthias Jouan <matthias.jouan@gmail.com>
 * @license FreeBSD License (http://opensource.org/licenses/BSD-2-Clause)
 */ 

namespace Plux\Demo\Component;

use \Plux\ComponentTrait;

class Footer {
	
	use ComponentTrait;
	
	public function render () {
		?>
		<footer><em>plux : demo - 2014 Matthias Jouan</em></footer>
		<?php
	}
	
}