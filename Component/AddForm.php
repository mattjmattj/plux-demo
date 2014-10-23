<?php
/**
 * @author Matthias Jouan <matthias.jouan@gmail.com>
 * @license FreeBSD License (http://opensource.org/licenses/BSD-2-Clause)
 */ 

namespace Plux\Demo\Component;

use \Plux\ComponentTrait;

class AddForm {
	
	use ComponentTrait;
	
	public function render () {
		?>
		<form method="POST" action="?add">
			<label>New item
				<input type="text" name="text" placeholder="New item" />
			</label>
		</form>
		<?php
	}
	
}