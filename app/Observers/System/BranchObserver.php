<?php

namespace App\Observers\System;

use Bsb\Foundation\Observer;
use Illuminate\Support\Str;
use App\Models\Auth\User;

class BranchObserver extends Observer
{
    /**
     * @param  mixed  $branch
     * @return void
     */
    public static function saving($branch)
    {
        // if ($branch->isDirty('code')) {
        //     $warehouses = $branch->warehouses;
        //     if ( ! is_null($warehouses)) {
        //         $warehouses->each(function ($warehouse) use ($branch) {
        //             $warehouse->code = Str::replaceFirst(
        //                 $branch->getOriginal('code'),
        //                 $branch->code,
        //                 $warehouse->code,
        //             );
        //             $warehouse->save();
        //         });
        //     }
        // }

        return true;
    }

    /**
     * @param  mixed  $branch
     * @return void
     */
    public static function saved($branch)
    {
        // Sync user.
        $branch->users()
            ->sync(
                User::where('all_branches', true)
                    ->get()->pluck('id')->all()
            );
        
        // Sync products.
        // $products = wbcm_model('master.product')::where('all_branches', true)->get();
        // $branchType = wbcm_model('system.branch_type')::whereHas(
        //     'products',
        //     function ($query) use ($products) {
        //         $query->whereIn('product_id', $products->pluck('id')->all());
        //     }
        // )->find($branch->branch_type_id);
        // if ( ! is_null($products)) {
        //     $data = [];
        //     $products->each(function ($product) use (&$data, $branchType) {
        //         $branchTypeProduct = $branchType->products->find($product->id);
        //         $data[$product->id] = is_null($branchTypeProduct)
        //             ?   [
        //                     'purchase' => $product->all_purchase,
        //                     'sales' => $product->all_sales,
        //                     'incoming_mutation' => $product->all_incoming_mutation,
        //                     'outgoing_mutation' => $product->all_outgoing_mutation,
        //                 ]
        //             :   [
        //                     'purchase' => $branchTypeProduct->pivot->purchase,
        //                     'sales' => $branchTypeProduct->pivot->sales,
        //                     'incoming_mutation' => $branchTypeProduct->pivot->incoming_mutation,
        //                     'outgoing_mutation' => $branchTypeProduct->pivot->outgoing_mutation,
        //                 ];
        //     });
        //     $branch->products()->sync($data);
        // }
    }
    
    /**
     * @param  mixed  $branch
     * @return void
     */
    public static function forceDeleting()
    {
        $branch->users()->detach();
    }
}
