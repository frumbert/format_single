<?php // $Id: format.php,v 2.3.0.1 2012/06/26 17:10:00 cirano Exp $
//
// You can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// It is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 *
 * @since 2.0
 * @package contribution
 * @copyright 2012 David Herney Bernal - cirano
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Display the whole course as "tabs"
// Included from "view.php"
// It is based of the "topics" format

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir.'/filelib.php');
require_once($CFG->libdir.'/completionlib.php');

// Horrible backwards compatible parameter aliasing..
if ($topic = optional_param('topic', 0, PARAM_INT)) {
    $url = $PAGE->url;
    $url->param('section', $topic);
    debugging('Outdated topic param passed to course/view.php', DEBUG_DEVELOPER);
    redirect($url);
}
// End backwards-compatible aliasing..

//single format is always multipage
$course->realcoursedisplay = $course->coursedisplay == COURSE_DISPLAY_MULTIPAGE;
$course->coursedisplay = COURSE_DISPLAY_MULTIPAGE;
        
$context = context_course::instance($course->id);

if (($marker >=0) && has_capability('moodle/course:setcurrentsection', $context) && confirm_sesskey()) {
    $course->marker = $marker;
    course_set_marker($course->id, $marker);
}

$renderer = $PAGE->get_renderer('format_single');

$section = optional_param('section', -1, PARAM_INT);

if (isset($section) && $section >= 0) {
     $USER->display[$course->id] = $section;
     $displaysection = $section;
} 
else {
    if (isset($USER->display[$course->id])) {
        $displaysection = $USER->display[$course->id];
    } else {
        $USER->display[$course->id] = 0;
        $displaysection = 0;
    }
}

$renderer->print_single_section_page($course, $sections, $mods, $modnames, $modnamesused, $displaysection);

// Include course format js module
$PAGE->requires->js('/course/format/topics/format.js');
