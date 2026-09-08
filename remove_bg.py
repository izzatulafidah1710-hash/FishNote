from PIL import Image

def remove_white_bg(img_path, out_path):
    img = Image.open(img_path)
    img = img.convert("RGBA")
    datas = img.getdata()
    
    newData = []
    # Toleransi warna putih (mendekati putih)
    for item in datas:
        if item[0] > 240 and item[1] > 240 and item[2] > 240:
            newData.append((255, 255, 255, 0)) # transparent
        else:
            newData.append(item)
            
    img.putdata(newData)
    img.save(out_path, "PNG")
    print(f"Berhasil menghapus background putih: {out_path}")

remove_white_bg("public/images/farmer_tablet_cutout.png", "public/images/farmer_tablet_cutout.png")
