<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Contact Us Controller
 *
 * PHP version 5
 * LICENSE: This source file is subject to LGPL license 
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/copyleft/lesser.html
 * @author     Ushahidi Team <team@ushahidi.com> 
 * @package    Ushahidi - http://source.ushahididev.com
 * @subpackage Controllers
 * @copyright  Ushahidi - http://www.ushahidi.com
 * @license    http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License (LGPL) 
 */

class Whatwedo_Controller extends Main_Controller 
{
	function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->template->header->this_page = 'whatwedo';
        $this->template->content = new View('whatwedo');
		
		// Setup and initialize form field names
        $form = array (
            'project_title' => '',
            'project_description' => '',
            'project_targets_and_pple_targeted' => '',
            'project_message' => '',
        );

        $errors = $form;
		
	
        $this->template->content->form = $form;
		
        // Rebuild Header Block
        $this->template->header->header_block = $this->themes->header_block();		
    }	
}
