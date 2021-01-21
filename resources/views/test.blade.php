<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Search') }}
        </h2>
    </x-slot>
    
    <div>
        <form action="{{route('image')}}" method="post" enctype="multipart/form-data">
            @csrf
              <input type="file" name="files[]" multiple>
              
              <input type="submit" value="Upload Files" name="submit">
              <button class="hover:bg-blue-50" type="submit"  name="submit" >Upload Files</button>
        </form>
          
        <p id="data"></p>
        <img class="h-10 w-10" src="{{cloudinary_url("profile_images/JQqiJ2kIFZeQ3uNOem9vPjI8QDKoE50CZh0aXWoH")}}" alt="">
    </div>
    

    
  
    <script>
        /*
        const url = "https://api.cloudinary.com/v1_1/demo/image/upload";
        const form = document.querySelector("form");

        form.addEventListener("submit", (e) => {
        e.preventDefault();

        const files = document.querySelector("[type=file]").files;
        const formData = new FormData();

        for (let i = 0; i < files.length; i++) {
            let file = files[i];
            formData.append("file", file);
            formData.append("upload_preset", "docs_upload_example_us_preset");

            fetch(url, {
            method: "POST",
            body: formData
            })
            .then((response) => {
                return response.text();
            })
            .then((data) => {
                document.getElementById("data").innerHTML += data;
                
               
            });
        }

        
        });
        */
     
    </script>
</x-app-layout>