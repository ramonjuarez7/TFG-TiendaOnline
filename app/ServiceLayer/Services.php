

    public static function addProductToCart($prod, $item) {
        $rollback = false;
        $mensaje = "";
        DB::beginTransaction();

        foreach($prod->ingredientes as $in){
            if($in->stock - 1 < $in->minStock) {
                $mensaje = 'No hay suficiente stock de: ' . $in->nombre;
                $rollback = true;
                break;
            }

            $in->stock -= 1;
            $in->save();
        }
        
        if ($rollback) {
            DB::rollBack();
            return $mensaje;
        }

        DB::commit();
        return "";
    }