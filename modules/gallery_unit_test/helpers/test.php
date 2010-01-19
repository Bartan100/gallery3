<?php defined("SYSPATH") or die("No direct script access.");
/**
 * Gallery - a web based photo album viewer and editor
 * Copyright (C) 2000-2009 Bharat Mediratta
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or (at
 * your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street - Fifth Floor, Boston, MA  02110-1301, USA.
 */
class test_Core {
  static function random_album_unsaved($parent=null) {
    $rand = rand();

    $album = ORM::factory("item");
    $album->type = "album";
    $album->parent_id = $parent ? $parent->id : 1;
    $album->name = "name_$rand";
    $album->title = "title_$rand";
    return $album;
  }

  static function random_album($parent=null) {
    return test::random_album_unsaved($parent)->save();
  }

  static function random_photo_unsaved($parent=null) {
    $rand = rand();
    $photo = ORM::factory("item");
    $photo->type = "photo";
    $photo->parent_id = $parent ? $parent->id : 1;
    $photo->set_data_file(MODPATH . "gallery/tests/test.jpg");
    $photo->name = "name_$rand.jpg";
    $photo->title = "title_$rand";
    return $photo;
  }

  static function random_photo($parent=null) {
    return test::random_photo_unsaved($parent)->save();
  }

  static function random_name($item=null) {
    $rand = "name_" . rand();
    if ($item && $item->is_photo()) {
      $rand .= ".jpg";
    }
    return $rand;
  }

  static function starts_with($outer, $inner) {
    return strpos($outer, $inner) === 0;
  }
}
