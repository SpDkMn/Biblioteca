[31m  > [0m[34m 7| [0m[32mclass [0m[39mAuthor [0m[32mextends [0m[39mModel[0m
    [34m 8| [0m[32m{[0m
    [34m 9| [0m[32m	protected [0m[39m$table [0m[32m= [0m[31m'authors'[0m[32m;[0m
    [34m10| [0m
    [34m11| [0m[32m	protected [0m[39m$fillable[0m[32m=[[0m[31m'name'[0m[32m];[0m
    [34m12| [0m
    [34m13| [0m[32m  public function [0m[39mcategories[0m[32m(){[0m
    [34m14| [0m[32m    return [0m[39m$this[0m[32m->[0m[39mbelongsToMany[0m[32m([0m[31m'\App\Category'[0m[32m,[0m[31m'author_category'[0m[32m);[0m
    [34m15| [0m[32m  }[0m
    [34m16| [0m[32m  [0m
    [34m17| [0m[32m  public function [0m[39mscopeName[0m[32m([0m[39m$query[0m[32m,[0m[39m$name[0m[32m){[0m
    [34m18| [0m[32m    if([0m[39mtrim[0m[32m([0m[39m$name[0m[32m)!=[0m[31m""[0m[32m){[0m
    [34m19| [0m[32m      return [0m[39m$query[0m[32m->[0m[39mwhere[0m[32m([0m[31m'name'[0m[32m,[0m[31m"LIKE"[0m[32m,[0m[31m"%[0m[39m$name[0m[31m%"[0m[32m);[0m
    [34m20| [0m[32m		}[0m
    [34m21| [0m[32m  }[0m
    [34m22| [0m
    [34m23| [0m[32m  public function [0m[39mscopeCategory[0m[32m([0m[39m$query[0m[32m,[0m[39m$category[0m[32m){[0m
    [34m24| [0m[32m    [0m[39m$categories[0m[32m=[[0m[31m'Libro'[0m[32m=>[0m[31m'Libro'[0m[32m,[0m[31m'Revista'[0m[32m=>[0m[31m'Revista'[0m[32m,[0m[31m'Tesis'[0m[32m=>[0m[31m'Tesis'[0m[32m,[0m[31m'Compendio'[0m[32m=>[0m[31m'Compendio'[0m[32m];[0m
    [34m25| [0m[32m    if([0m[39m$category[0m[32m!=[0m[31m"" [0m[32m&& isset([0m[39m$categories[0m[32m[[0m[39m$category[0m[32m])){[0m
    [34m26| [0m[32m      [0m[39m$query[0m[32m->[0m[39mwhere[0m[32m([0m[31m'Category'[0m[32m,[0m[39m$category[0m[32m);[0m
    [34m27| [0m[32m    }[0m
    [34m28| [0m[32m  }[0m
    [34m29| [0m
    [34m30| [0m[32m}[0m

