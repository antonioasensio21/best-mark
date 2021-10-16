<tr>
                                        <td class="text-center"><input type="number" class="form-control itemQty" min="1" max="3" value="<?= $row['qty'] ?>" style="width:75px;"> </td>
                                        <td class="text-center"> <img class="uk-preserve-width uk-border-circle" src="<?= $row['product_image'] ?>" style="width: 50px;" alt=""> </td>
                                        <td class="ss text-left"> <?= $row['product_name'] ?> </td>
                                        <td class="text-left">$ <?= $row['product_price'] ?> </td>
                                        <td class="text-center"><a href="action-cart.php?remove=<?= $row['id'] ?>"><span class="text-danger">
                                                    <ion-icon name="trash-outline"></ion-icon>
                                                </span></a></td>
                                        <td class="text-center" colspan="5"> <?= number_format($row['total_price'], 2); ?></td>
                                    </tr>




                                    <div class="col-lg-4 col-12">
                    <style>
                    @media screen and (max-width: 768px){
                         .right {
                             margin: 20px 0;
                     }
                    }
                    </style>
                    <div style="background: white; box-shadow: 0 4px 24px 0 rgb(0 0 0 / 10%); padding:15px; border-radius:12px;" class="right">
                    <?php $total2 += $producto['precio']; ?>
                        <?php
                        $total = 0;
                        $descuento = 100 / 100;
                        $envio = 10;
                        ?>
                        <ul>
                            <li>Subtotal del carrito<span>$ <?= number_format($grand_total, 2); ?></span></li>
                            <li>Impuestos<span>$0.00</span></li>
                            <li>Descuento<span>0%</span></li>
                            <li>Envio<span>$10.00</span></li>
                            <li style="font-weight: 700;" class="last">Total a Pagar<span>USD $ <?php echo number_format($grand_total * $descuento + $envio, 2); ?></span></li>

                        </ul>
                    </div>
                    <hr>
                    <div class="modal-header" style="padding:0px; padding-left: 0px;">
                        <a href="/" type="button" class="btn btn-success">Seguir comprando</a>
                        <a href="#" type="button" class="btn btn-dark <?= ($grand_total > 0) ? '' : 'disabled'; ?>"> Checkout</a>
                    </div>
                    <br>
                </div>