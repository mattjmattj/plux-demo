<?php
/**
 * @author Matthias Jouan <matthias.jouan@gmail.com>
 * @license FreeBSD License (http://opensource.org/licenses/BSD-2-Clause)
 */ 

namespace Plux\Demo\Component;

use \Plux\ComponentTrait;

class Header {
	
	use ComponentTrait;
	
	public function render () {
		?>
		<h1>plux : demo</h1>
		<?php
	}
	
}