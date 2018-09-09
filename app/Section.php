<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $casts = [
        'entry_point' => 'boolean'
    ];

    public $timestamps = false;

    protected $fillable = ['section_id', 'name', 'hascontent', 'horizontal_position', 'vertical_position'];

    protected $table = 'sections';

    public function subSections()
    {
        return $this->hasMany(Section::class);
    }

    public function superSection()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function superSectionN($n)
    {
        $superSectionN = $this;
        for ($i = 1; $i <= $n; $i++) {
            $superSectionN = $superSectionN->superSection;
            if ($superSectionN == null)
                return $superSectionN;
        }
        return $superSectionN;
    }

    public function page()
    {
        return $this->hasOne('App\Page');
    }

    public static function getSection($name)
    {
        $currentSection = Section::where('name', $name)->first();
        if ($currentSection == null) {
            $currentSection = Section::getSection('main');
        }
        return $currentSection;
    }

    public function getGoBackSection()
    {
        if ($this->hasContent) {
            return $this->horizontal_position == 1 ? $this->superSectionN(3) : $this->superSectionN(4);
        }
        return $this->superSectionN(2);
    }

    public function hasGoBackSection()
    {
        $parentSection = $this;
        $goBackSection = null;

        if ($this->hasContent) {
            if ($this->horizontal_position == 1) {
                $parentSection = $this->superSection;
            } else if ($this->horizontal_position == 2) {
                $parentSection = $this->superSectionN(2);
            }
        }

        if ($parentSection) {
            $goBackSection = $parentSection->superSectionN(2);
        }
        return null != $goBackSection;
    }


    public function getChildren()
    {
        return $this->getChildrenParent()->subSections->sortBy('vertical_position');
    }

    public function addNewChild(Section $section)
    {
        $this->subSections()->save($section);
    }

    public function getChildrenParent()
    {
        $currentNode = $this;
        if ($currentNode->hasContent) {
            $currentNode = $currentNode->horizontal_position == 1 ? $currentNode->superSectionN(1) : $currentNode->superSectionN(2);
        }
        return $currentNode;
    }

    public function moveUp()
    {
        $parent = $this->superSection;
        if (null != $parent) {
            $children = $parent->subSections->sortBy('vertical_position');
            $elementBefore = $this;
            $found = false;

            foreach ($children as $child) {
                if ($child->name == $this->name) {
                    $found = true;
                    break;
                }
                $elementBefore = $child;
            }

            if ($found) {
                $elementBeforeposition = $elementBefore->vertical_position;
                $currentPosition = $this->vertical_position;

                $this->vertical_position = $elementBeforeposition;
                $elementBefore->vertical_position = $currentPosition;

                $this->save();
                $elementBefore->save();
            }
        }
    }

    public function moveDown()
    {
        $parent = $this->superSection;
        if (null != $parent) {
            $children = $parent->subSections->sortBy('vertical_position');
            $elementafter = null;
            $found = false;

            foreach ($children as $child) {
                $elementafter = $child;

                if ($found)
                    break;

                if ($child->name == $this->name) {
                    $found = true;
                }
            }

            if ($found) {
                $elementBeforeposition = $elementafter->vertical_position;
                $currentPosition = $this->vertical_position;

                $this->vertical_position = $elementBeforeposition;
                $elementafter->vertical_position = $currentPosition;

                $this->save();
                $elementafter->save();
            }
        }
    }
}
