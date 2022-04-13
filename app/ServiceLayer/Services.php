public static function processOrder($tarj, $Pedido, $dir) {
        
        $rollback = false;
        DB::beginTransaction();

        $id = Auth::user()->id;
        $user = Usuario::findOrFail($id);

        $Pedido->usuario = $user->email;
        $Pedido->save();

        $Pedido->direccion = $dir->id;

        $cart = ShoppingCart::All();
        foreach ($cart as $item) {
            $product = Producto::findOrFail($item->id);
            
            $product->popularidad += $item->qty;
            
            $Pedido->precio += $item->total;
            $Pedido->estado = 'Preparando';
            $Pedido->tarjeta = $tarj->numero;
            $Pedido->productos()->attach($product, ['cantidad' => $item->qty]);
        }
        
        if ($rollback) {
            DB::rollBack();
            return false;
        }

        DB::commit();
        return true;
    }

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