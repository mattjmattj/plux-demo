<?php
/**
 * @author Matthias Jouan <matthias.jouan@gmail.com>
 * @license FreeBSD License (http://opensource.org/licenses/BSD-2-Clause)
 */ 

namespace Plux\Demo\Component;

use Plux\Plux;

class Flash extends \Plux\Demo\Framework\Component {
	
	private $messages;
	
	public function __construct () {
		$this->messages = [];
		$this->initEvents();
	}
	
	public function render () {
		?>
		<ul>
		<?php
		foreach ($this->messages as $message):
		?>	
			<li class="success round label">Message : <?php echo $message; ?></li>
		<?php
		endforeach;
		?>
		</ul>
		<?php
	}
	
	private function initEvents () {
		Plux::getStore('Items')->on('add', function($id, $text) {
			$this->messages[] = "Added item \"$text\"";
		});
		
		Plux::getStore('Items')->on('delete', function($id, $text) {
			$this->messages[] = "Deleted item \"$text\"";
		});
		
		Plux::getStore('ActionLog')->on('clear', function() {
			$this->messages[] = "Log cleared";
		});
	}
}