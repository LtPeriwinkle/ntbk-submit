#!/usr/bin/python
import numpy

clear = open("apex_data.txt", "w")
clear.close()

with open("apex_raw.csv") as f:
    names = []
    scores = []
    for line in f:
        arr = line.split(",")
        names.append(arr[0].lower())
        scores.append(int(arr[1]))
print(names)
i = 0
print(len(names))
used_names = []
while i < len(names):
    current_name = names[i]
    per_name_score = []
    for index,name in enumerate(names):
        if name == current_name:
            per_name_score.append(scores[index])
    np_name_scores = numpy.array(per_name_score)
    to_display = [numpy.mean(np_name_scores), numpy.amax(np_name_scores), numpy.amin(np_name_scores), numpy.std(np_name_scores)]
    print(to_display)
    with open("apex_data.txt", "a") as f:
        if current_name not in used_names:
            used_names.append(current_name)
            f.write("<tr>\n<td>{}</td>\n<td>{}</td>\n<td>{}</td>\n<td>{}</td>\n<td>{}</td>\n</tr>".format(current_name, to_display[0], to_display[1], to_display[2], to_display[3]))
    i += 1
