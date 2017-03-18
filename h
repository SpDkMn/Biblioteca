[31m  > [0m[34m 7| [0m[32mclass [0m[39mAuthor [0m[32mextends [0m[39mModel[0m
    [34m 8| [0m[32m{[0m
    [34m 9| [0m
    [34m10| [0m[32m    protected [0m[39m$fillable [0m[32m= [[0m[31m'name'[0m[32m];[0m
    [34m11| [0m
    [34m12| [0m[32m    [0m[33m//Un autor pertenece a una revista[0m
    [34m13| [0m[33m    [0m[32mpublic function [0m[39mmagazine[0m[32m(){[0m
    [34m14| [0m[32m    	return [0m[39m$this[0m[32m->[0m[39mhasMany[0m[32m([0m[31m'App\Magazine'[0m[32m);[0m
    [34m15| [0m[32m    }[0m
    [34m16| [0m[32m    [0m[33m//Un autor (Colaborador) pertenece a un contenido[0m
    [34m17| [0m[33m    [0m[32mpublic function [0m[39mcontents[0m[32m(){[0m
    [34m18| [0m[32m    	return [0m[39m$this[0m[32m->[0m[39mbelongsToMany[0m[32m([0m[31m'App\Content'[0m[32m,[0m[31m'author_content'[0m[32m);[0m
    [34m19| [0m[32m    }[0m
    [34m20| [0m[32m    [0m[33m//Un autor pertenece a muchas categorias[0m
    [34m21| [0m[33m    [0m[32mpublic function [0m[39mcategories[0m[32m(){[0m
    [34m22| [0m[32m        return [0m[39m$this[0m[32m->[0m[39mbelongsToMany[0m[32m([0m[31m'App\Category'[0m[32m,[0m[31m'author_category'[0m[32m);[0m
    [34m23| [0m[32m    }[0m
    [34m24| [0m[32m}[0m

