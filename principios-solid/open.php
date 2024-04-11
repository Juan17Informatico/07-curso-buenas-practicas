<?php 


abstract class Documentos{
    public abstract void Process(); 
}
class Factura: Documentos { }
class Recibo: Documentos { }
class Memo : Documentos { }
class Ticket : Documentos { }
class Autorizaciones : Documentos { }

class Comprobante
{
    public void ComprobanteProcess(Documentos docs)
    {        
	docs.Process();
    }
}