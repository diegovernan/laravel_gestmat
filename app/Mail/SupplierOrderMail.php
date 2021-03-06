<?php

namespace App\Mail;

use App\SupplierOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SupplierOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $supplierorder;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(SupplierOrder $supplierorder)
    {
        $this->supplierorder = $supplierorder;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.orders.supplier-orders');
    }
}
