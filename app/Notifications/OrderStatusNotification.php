<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class OrderStatusNotification extends Notification
{
    use Queueable;
    public $order;
    public $recipient;

    /**
     * Status of the order.
     */
    public function __construct(Order $order,$recipient)
    {
        $this->order = $order;
        $this->recipient = $recipient;
    }

    /**
     * Get the notification's delivery channels.
     *
     * return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Order '.ucwords($this->order->status))
                    ->line($this->message())
                    ->line('Thank you for using Herbs of Africa!');
    }

    /**
     * Get the array representation of the notification.
     *
     * return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }

    public function message(){
        switch($this->recipient){
            case 'admin': return $this->adminMessage();
                break;
            case 'affiliate': return $this->affiliateMessage();
                break;
            case 'customer': return $this->customerMessage();
                break;
        }
    }

    public function customerMessage(){
        $text = '';
        switch($this->order->status){
            case 'processing':
                $text =  "Order with ID: ".$this->order->id." has been received is currently being processed";
            break;
            case 'delivered':
                    $text = "Order with ID: ".$this->order->id." has been delivered to you on ".$this->order->status_time;
                break;
            case 'shipped':
                $text = "Order with ID: ".$this->order->id." has been shipped on ".$this->order->status_time." and will soon be delivered";
            break;
            case 'ready':
                if($this->order->shipping->rate->method == 'local-pickup') 
                $text = "Order with ID: ".$this->order->id." is ready for pickup";
                else 
                $text =  "Order with ID: ".$this->order->id." is about to be shipped";   
            break;
            case 'refunded':
                $text = "Refund of ".$this->order->currency." ".$this->order->total." for Order with ID: ".$this->order->id. " has been completed";
            break;     
        }
        return $text;
    }

    public function affiliateMessage(){
        $text = '';
        switch($this->order->status){
            case 'processing':
                $text =  "An affiliate Order with ID:".$this->order->id." has been received through your referral and its currently being processed. Earnings will be calculated and 
                deposited in your account upon completion of the order cycle.";
            break;

            case 'cancelled':
                $text = "An affiliate Order with ID: ".$this->order->id." was cancelled by your customer on ".$this->order->status_time.". Payments made will 
                be refunded to the customer.";
            break;

            case 'delivered':
                    $text = "Order with ID: ".$this->order->id." has been delivered to your customer on ".$this->order->status_time.". Details of earnings are available 
                    on your affiliate dashboard. Please note that funds are not available for withdrawal till 14 days after the order was made.";
            break;

            case 'disliked':
                    $text =  "A refund for Order with ID: ".$this->order->id." was requested by the customer on ".$this->order->status_time.". Earnings accrued from this order has been withheld." ;
            break;

            case 'refunded':
                $text = "We have completed the refund for Order with ID: ".$this->order->id. " to the customer. ";
            break; 
        }
        return $text;
    }

    public function adminMessage(){
        $text = '';
        switch($this->order->status){
            case 'processing':
                $text =  "Order with ID:".$this->order->id." was received on ".$this->order->created_at->format('d-M-Y h:i A');
            break;

            case 'cancelled':
                $text = "Order with ID:".$this->order->id." was cancelled on ".$this->order->status_time;
            break;

            case 'disliked':
                $text =  "A refund has been requested for Order with ID: ".$this->order->id." on ".$this->order->status_time;
            break;      
        }
        return $text;
    }
}
