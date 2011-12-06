<?php
require_once('model.php');

class CarModel extends Model {

    public static $vehicle_columns = array('vehicle_id','feature_set','model_id','engine_id','transmission_id',
                                           'brake_id','model_year','vehicle_condition','body_color',
                                           'hwy_mpg','city_mpg','fuel_tank_size',
                                           'advertised_sale_price','miles');

    public static $feature_columns = array('string_position','feature');

    public static $model_columns = array('model_id','model_name','make_id','trim','body_type');

    public static $make_columns = array('make_id','make_name');

    public static $engine_columns = array('engine_id','displacement','fuel_system','horsepower','torque','cylinders','shape');

    public static $brake_columns = array('brake_id','brake_abs_system','front_brake_type','rear_brake_type');

    public static $transmission_columns = array('transmission_id','drivetrain','transmission_type','num_gears');

    public static function GetCar($id) {
        $result = array();
        $options = array(
            'conditions' => "vehicle_id = $id",
            'limit'      => 1
            );
        
        // Vehicle query
        $columns = array_merge($vehicle_columns, $model_columns, $make_columns);
        $options['joins'] = array('models','makes');
        $result['vehicle'] = parent::Select('vehicles', $columns, $options);

        // Engine query
        $columns = $engine_columns;
        $options['joins'] = array('engines');
        $result['engine'] = parent::Select('vehicles', $columns, $options);

        // Transmission query
        $columns = $transmission_columns;
        $options['joins'] = array('transmissions');
        $result['transmission'] = parent::Select('vehicles', $columns, $options);

        // Brakes query
        $columns = $brakes_columns;
        $options['joins'] = array('brakes');
        $result['brakes'] = parent::Select('vehicles', $columns, $options);

        return empty($result) ? null : $result;
    }

}
