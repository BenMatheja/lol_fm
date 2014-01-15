<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 14/01/14
 * Time: 14:41
 */
$app->get(
    '/',
    function () use ($app, $config) {
        $app->view()->setData(array(
            'active' => array('home'),
            'title' => 'LoLFM'
        ));
        $app->render('home.html');
    });

$app->get(
    '/profile',
    function () use ($app, $config) {
        $app->view()->setData(array(
            'active' => array('home'),
            'title' => 'LoLFM'
        ));
        $app->render('profile.html');
    }
);

// HELPER FUNCTIONS

/**
 * Translates an array of objects to an array of arrays.
 * This is needed before use in templates.
 *
 * @param $objects Array of Paris objects
 * @return array
 */
function arrayMap($objects)
{
    return array_map(function ($model) {
        return $model->as_array();
    }, $objects);
}

/**
 * Retrieves second level object(s) of specified type for each object in the provided array.
 * Attributes of second level objects can be filtered by additional parameters.
 * Returned array still has to be mapped before use in template.
 *
 * @example retrieveSecondLvl($movie->ratings()->find_many(), 'customer', false); Makes all attibutes available via rating.customer.var_name
 * @example retrieveSecondLvl($edition->copies()->find_many(),'inventoryObjects',true, 'defects', 'toString()'); Makes only defects and result of toString() (as to_string) available
 *
 * @param array $objects Array of Paris objects
 * @param string $target Name of the method to retrieve the second level objects without parantheses
 * @param boolean $hasMany Has many second level objects or belongs just to one
 * @param string $ttribute1,... unlimited OPTIONAL Attributes or method results to retrieve from every second level object. Method names with parantheses.
 * @return array Returns the array of then modified objects
 */
function retrieveSecondLvl($objects, $target, $hasMany)
{
    $numargs = func_num_args();
    $targetUncamelized = strtolower(preg_replace('/(?!^)[[:upper:]][[:lower:]]/', '$0', preg_replace('/(?!^)[[:upper:]]+/', '_$0', $target))); //convert to underscore notation for use in template

    $attributeArgs = func_get_args();
    foreach ($objects as $o) { //for each first level object
        if ($numargs > 3) { //if attributes/method results to filter are supplied
            $idColumn = $target . '_id';
            if ($o->$idColumn != null || $hasMany) { //if ID of second level object is supplied or object has many second level objects
                $outArray = array();
                for ($i = 3; $i < $numargs; $i++) { //for every attribute/method result to filter
                    $attribute = $attributeArgs[$i];
                    $isMethod = substr($attribute, strlen($attribute) - 2) == "()";
                    if ($isMethod) {
                        $methodNameStripped = str_replace(array('(', ')'), '', $attribute); //remove parantheses from method string
                        $outVar = strtolower(preg_replace('/(?!^)[[:upper:]][[:lower:]]/', '$0', preg_replace('/(?!^)[[:upper:]]+/', '_$0', $methodNameStripped))); //convert to underscore notation for use in template
                    }
                    if (!$hasMany) {
                        if ($isMethod) {
                            $outArray[$outVar] = $o->$target()->find_one()->$methodNameStripped(); //set method result in array of second level object
                        } else {
                            $outArray[$attribute] = $o->$target()->find_one()->$attribute; //set attribute in array of second level object
                        }
                    } else {
                        $entities = $o->$target()->find_many(); //find all second level objects
                        for ($j = 0; $j < count($entities); $j++) { //for each second level object
                            if ($isMethod) {
                                $outArray[$j][$outVar] = $entities[$j]->$methodNameStripped(); //set method result in array of second level object
                            } else {
                                $outArray[$j][$attribute] = $entities[$j]->$attribute; //set attribute in array of second level object
                            }
                        }
                    }
                }
                $o->$targetUncamelized = $outArray; //set array of second level object as attribute of first level object
            }
        } else { //retrieve second level objects with all attributes
            if (!$hasMany)
                $o->$targetUncamelized = $o->$target()->find_one(); //set second level object as attribute of first level object
            else
                $o->$targetUncamelized = $o->$target()->find_many(); //set array of second level objects as attribute of first level object
        }
    }
    return $objects; //return array of modified first level objects
}

/**
 * Sets the result of specified method(s) as an attribute in each object of the given Array.
 * Result must still be converted into an array before use in template.
 *
 * @example setMethodResult(Model::factory('Customer')->find_many(), 'fullName()')
 *
 * @param $objects Array of or single Paris object
 * @param $functionName,... Names of the function to call on each object. Result will be stored as attribute in underscore notation.
 * @return array Returns the (array of) modified object(s)
 */
function setMethodResult($objects, $functionName)
{
    if (!isset($objects) || empty($objects) || gettype($objects) !== 'object') {
        return $objects;
    }
    $numargs = func_num_args();
    $attributeArgs = func_get_args();
    for ($i = 1; $i < $numargs; $i++) { //for method result to add
        $methodNameStripped = str_replace(array('(', ')'), '', $attributeArgs[$i]); //remove parantheses from method string
        $outVar = strtolower(preg_replace('/(?!^)[[:upper:]][[:lower:]]/', '$0', preg_replace('/(?!^)[[:upper:]]+/', '_$0', $methodNameStripped))); //convert to underscore notation for use in template
        if (count($objects) == 1) {
            $objects->$outVar = $objects->$methodNameStripped();
        } else if (count($objects) > 1) {
            foreach ($objects as $o) {
                $o->$outVar = $o->$methodNameStripped();
            }
        }
    }
    return $objects;
}

/**Here's my version, You can pass any number of arrays and it will interlace and key them properly.
 * @return array|bool
 */
function array_interlace()
{
    $args = func_get_args();
    $total = count($args);

    if ($total < 2) {
        return FALSE;
    }

    $i = 0;
    $j = 0;
    $arr = array();

    foreach ($args as $arg) {
        foreach ($arg as $v) {
            $arr[$j] = $v;
            $j += $total;
        }

        $i++;
        $j = $i;
    }

    ksort($arr);
    return array_values($arr);
}

?>