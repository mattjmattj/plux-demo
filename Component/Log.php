<?php
/**
 * @author Matthias Jouan <matthias.jouan@gmail.com>
 * @license FreeBSD License (http://opensource.org/licenses/BSD-2-Clause)
 */ 

namespace Plux\Demo\Component;

use \Plux\ComponentTrait;
use \Plux\Plux;

class Log {
	
	use ComponentTrait;
	
	public function render () {
		$items = Plux::getStore('ActionLog')->getData();
		$items = array_reverse ($items, true);
		?>
		<h3>Action log</h3>
		<table>
		<?php
		foreach ($items as $id => $item) :
		?>
			<tr>
				<td><?php echo strip_tags($item); ?></td>
			</tr>
		<?php
		endforeach;
		?>
		</table>
		<?php
	}
	
}