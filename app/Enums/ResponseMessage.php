<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class ResponseMessage extends Enum
{
    const SUCCESSFUL_SUBMIT = "Información enviada y almacenada con éxito.";
    const ERROR = "";
    const INFO = "";

    const BDD_SAVE_ERROR = "Error al guardar la información. (ERROR BDD01)";
    const BDD_UPDATE_ERROR = "Error al actualizar la información. (ERROR BDD02)";
    const BDD_QUERY_ERROR = "Error al consultar la información en la base de datos. (ERROR BDD03)";

    const SUCCESSFUL_DELETE = "Información eliminada correctamente.";

    const SUCCESSFUL_PREVALIDATION = "Información validada satisfactoriamente.";
}
